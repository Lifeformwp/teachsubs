<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170501110006 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video_series CHANGE en_sub en_sub VARCHAR(255) DEFAULT NULL, CHANGE ru_sub ru_sub VARCHAR(255) DEFAULT NULL, CHANGE it_sub it_sub VARCHAR(255) DEFAULT NULL, CHANGE de_sub de_sub VARCHAR(255) DEFAULT NULL, CHANGE jp_sub jp_sub VARCHAR(255) DEFAULT NULL, CHANGE fr_sub fr_sub VARCHAR(255) DEFAULT NULL, CHANGE zh_sub zh_sub VARCHAR(255) DEFAULT NULL, CHANGE cs_sub cs_sub VARCHAR(255) DEFAULT NULL, CHANGE lt_sub lt_sub VARCHAR(255) DEFAULT NULL, CHANGE pl_sub pl_sub VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE video_series CHANGE en_sub en_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE ru_sub ru_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE it_sub it_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE de_sub de_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE jp_sub jp_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE fr_sub fr_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE zh_sub zh_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE cs_sub cs_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE lt_sub lt_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE pl_sub pl_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
