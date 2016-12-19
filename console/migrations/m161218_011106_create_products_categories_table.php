<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_categories`.
 */
class m161218_011106_create_products_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products_categories', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-products_categories-product_id',
            'products_categories',
            'product_id'
        );

        $this->addForeignKey(
            'fk-products_categories-product_id',
            'products_categories',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
        
        $this->createIndex(
            'idx-products_categories-category_id',
            'products_categories',
            'category_id'
        );

        $this->addForeignKey(
            'fk-products_categories-category_id',
            'products_categories',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products_categories');
    }
}
