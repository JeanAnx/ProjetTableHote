<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108110413 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hours DROP FOREIGN KEY FK_8A1ABD8D73B8532F');
        $this->addSql('DROP INDEX IDX_8A1ABD8D73B8532F ON hours');
        $this->addSql('ALTER TABLE hours CHANGE table_id_id host_table_id INT NOT NULL');
        $this->addSql('ALTER TABLE hours ADD CONSTRAINT FK_8A1ABD8DBD16D44A FOREIGN KEY (host_table_id) REFERENCES host_tables (id)');
        $this->addSql('CREATE INDEX IDX_8A1ABD8DBD16D44A ON hours (host_table_id)');
        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C3573B8532F');
        $this->addSql('DROP INDEX IDX_7A853C3573B8532F ON bookings');
        $this->addSql('ALTER TABLE bookings CHANGE table_id_id host_table_id INT NOT NULL');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35BD16D44A FOREIGN KEY (host_table_id) REFERENCES host_tables (id)');
        $this->addSql('CREATE INDEX IDX_7A853C35BD16D44A ON bookings (host_table_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35BD16D44A');
        $this->addSql('DROP INDEX IDX_7A853C35BD16D44A ON bookings');
        $this->addSql('ALTER TABLE bookings CHANGE host_table_id table_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C3573B8532F FOREIGN KEY (table_id_id) REFERENCES host_tables (id)');
        $this->addSql('CREATE INDEX IDX_7A853C3573B8532F ON bookings (table_id_id)');
        $this->addSql('ALTER TABLE hours DROP FOREIGN KEY FK_8A1ABD8DBD16D44A');
        $this->addSql('DROP INDEX IDX_8A1ABD8DBD16D44A ON hours');
        $this->addSql('ALTER TABLE hours CHANGE host_table_id table_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE hours ADD CONSTRAINT FK_8A1ABD8D73B8532F FOREIGN KEY (table_id_id) REFERENCES host_tables (id)');
        $this->addSql('CREATE INDEX IDX_8A1ABD8D73B8532F ON hours (table_id_id)');
    }
}
