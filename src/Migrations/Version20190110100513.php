<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190110100513 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE host_tables ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE host_tables ADD CONSTRAINT FK_A050C3CA61220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A050C3CA61220EA6 ON host_tables (creator_id)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE host_tables DROP FOREIGN KEY FK_A050C3CA61220EA6');
        $this->addSql('DROP INDEX IDX_A050C3CA61220EA6 ON host_tables');
        $this->addSql('ALTER TABLE host_tables DROP creator_id');
    }
}
