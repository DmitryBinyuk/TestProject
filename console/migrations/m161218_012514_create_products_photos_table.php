<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_photos`.
 */
class m161218_012514_create_products_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products_photos', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'photo_id' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex(
            'idx-products_photos-product_id',
            'products_photos',
            'product_id'
        );

        $this->addForeignKey(
            'fk-products_photos-product_id',
            'products_photos',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
        
        $this->createIndex(
            'idx-products_photos-photo_id',
            'products_photos',
            'photo_id'
        );

        $this->addForeignKey(
            'fk-products_photos-photo_id',
            'products_photos',
            'photo_id',
            'photos',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products_photos');
    }
}
