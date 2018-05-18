<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180518224158 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gods (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, ultimateCooldown VARCHAR(200) DEFAULT NULL, attackSpeed NUMERIC(16, 4) DEFAULT NULL, attackSpeedPerLevel NUMERIC(16, 4) DEFAULT NULL, hp5PerLevel NUMERIC(16, 4) DEFAULT NULL, health INT DEFAULT NULL, healthPerFive INT DEFAULT NULL, healthPerLevel INT DEFAULT NULL, mp5PerLevel NUMERIC(16, 4) DEFAULT NULL, magicProtection INT DEFAULT NULL, magicProtectionPerLevel NUMERIC(16, 4) DEFAULT NULL, magicalPower INT DEFAULT NULL, magicalPowerPerLevel NUMERIC(16, 4) DEFAULT NULL, mana INT DEFAULT NULL, manaPerFive NUMERIC(16, 4) DEFAULT NULL, manaPerLevel INT DEFAULT NULL, pantheon VARCHAR(255) DEFAULT NULL, physicalPower INT DEFAULT NULL, physicalPowerPerLevel NUMERIC(16, 4) DEFAULT NULL, physicalProtection INT DEFAULT NULL, physicalProtectionPerLevel NUMERIC(16, 4) DEFAULT NULL, roles VARCHAR(200) DEFAULT NULL, speed INT DEFAULT NULL, title VARCHAR(200) NOT NULL, type VARCHAR(200) NOT NULL, apiId INT DEFAULT NULL, godCardUrl VARCHAR(200) DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE gods');
    }
}
