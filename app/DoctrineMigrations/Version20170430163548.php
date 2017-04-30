<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170430163548 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE series_subtitles');
        $this->addSql('ALTER TABLE video_series ADD en_sub VARCHAR(255) NOT NULL, ADD ru_sub VARCHAR(255) NOT NULL, ADD it_sub VARCHAR(255) NOT NULL, ADD de_sub VARCHAR(255) NOT NULL, ADD jp_sub VARCHAR(255) NOT NULL, ADD fr_sub VARCHAR(255) NOT NULL, ADD zh_sub VARCHAR(255) NOT NULL, ADD cs_sub VARCHAR(255) NOT NULL, ADD lt_sub VARCHAR(255) NOT NULL, ADD pl_sub VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE series_subtitles (id INT AUTO_INCREMENT NOT NULL, series_id INT NOT NULL, en_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ru_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, it_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, de_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, jp_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, fr_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, zh_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, cs_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, lt_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, pl_sub VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_37D53F8F5278319C (series_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE series_subtitles ADD CONSTRAINT FK_37D53F8F5278319C FOREIGN KEY (series_id) REFERENCES video_series (id)');
        $this->addSql('ALTER TABLE video_series DROP en_sub, DROP ru_sub, DROP it_sub, DROP de_sub, DROP jp_sub, DROP fr_sub, DROP zh_sub, DROP cs_sub, DROP lt_sub, DROP pl_sub');
    }
}
