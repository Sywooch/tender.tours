<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\RegistrationForm;

/**
 * UserSearch represents the model behind the search form about `app\models\RegistrationForm`.
 */
class UserSearch extends RegistrationForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TYPE', 'STATUS'], 'integer'],
            [['USERNAME', 'PASSWORD_HASH', 'PASSWORD_RESET_TOKEN', 'EMAIL', 'CREATED_AT'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RegistrationForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'TYPE' => $this->TYPE,
            'STATUS' => $this->STATUS,
            'CREATED_AT' => $this->CREATED_AT,
        ]);

        $query->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'PASSWORD_HASH', $this->PASSWORD_HASH])
            ->andFilterWhere(['like', 'PASSWORD_RESET_TOKEN', $this->PASSWORD_RESET_TOKEN])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL]);

        return $dataProvider;
    }
}
