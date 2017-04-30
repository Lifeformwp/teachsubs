<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170430125359 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE series_subtitles ADD series_id INT NOT NULL');
        $this->addSql('ALTER TABLE series_subtitles ADD CONSTRAINT FK_37D53F8F5278319C FOREIGN KEY (series_id) REFERENCES video_series (id)');
        $this->addSql('CREATE INDEX IDX_37D53F8F5278319C ON series_subtitles (series_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE series_subtitles DROP FOREIGN KEY FK_37D53F8F5278319C');
        $this->addSql('DROP INDEX IDX_37D53F8F5278319C ON series_subtitles');
        $this->addSql('ALTER TABLE series_subtitles DROP series_id');
    }
}
