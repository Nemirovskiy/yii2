<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Access;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccessController implements the CRUD actions for Access model.
 */
class AccessController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Список только своих доступов
     *
     * @ return mixed
     */
    public function actionIndex()
    {
        $user = Access::find()->where(['=','user_id',Yii::$app->user->id]);
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException();
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => Access::find()->where(['=','user_id',Yii::$app->user->id]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    /**
     * Displays a single Access model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Access model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($noteId)
    {
        $model = new Access();
        $model->note_id = $noteId;
        $users = User::find()->select('username,id')
            ->where(['<>','id',Yii::$app->user->id])
            ->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Сохранено!');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users
        ]);
    }

    /**
     * Updates an existing Access model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Access model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Access model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Access the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Access::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
