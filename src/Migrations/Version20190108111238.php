<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108111238 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE host_tables (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, min_price DOUBLE PRECISION NOT NULL, max_price DOUBLE PRECISION NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, capacity INT NOT NULL, tel VARCHAR(25) NOT NULL, website VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION NOT NULL, long_description LONGTEXT NOT NULL, short_description VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', zip_code VARCHAR(255) NOT NULL, cook_style LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password_hash VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, health VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hours (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(25) NOT NULL, morning_start TIME NOT NULL, morning_end TIME NOT NULL, evening_start TIME NOT NULL, evening_end TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, host_table_id INT NOT NULL, date DATETIME NOT NULL, seats INT NOT NULL, name VARCHAR(255) NOT NULL, health LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_7A853C35BD16D44A (host_table_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bookings ADD CONSTRAINT FK_7A853C35BD16D44A FOREIGN KEY (host_table_id) REFERENCES host_tables (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bookings DROP FOREIGN KEY FK_7A853C35BD16D44A');
        $this->addSql('DROP TABLE host_tables');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE hours');
        $this->addSql('DROP TABLE bookings');
    }
}
