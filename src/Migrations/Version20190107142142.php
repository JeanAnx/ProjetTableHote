<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107142142 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE host_tables (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, min_price DOUBLE PRECISION NOT NULL, max_price DOUBLE PRECISION NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, capacity INT NOT NULL, tel VARCHAR(25) NOT NULL, website VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION NOT NULL, long_description VARCHAR(255) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', zip_code VARCHAR(255) NOT NULL, cook_style LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE host_tables');
    }
}
