<?php


namespace backend\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

class OrdersSearch extends Orders
{

    public function rules()
    {
        return [
            [['id','guests','price','nights'], 'integer'],
            [['username', 'email', 'dateIn','dateOut','telephone','room'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dateIn'=>$this->dateIn,
            'dateOut'=>$this->dateOut,
            'guests'=>$this->guests,
            'nights'=>$this->nights,
            'price'=>$this->price,


        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'dateIn', $this->dateIn])
            ->andFilterWhere(['like', 'dateOut', $this->dateOut])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'nights', $this->nights])
            ->andFilterWhere(['like', 'guests', $this->guests])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'room', $this->room]);

        return $dataProvider;
    }
}