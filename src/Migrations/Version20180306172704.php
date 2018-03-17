<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180306172704 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_image DROP id_product');
        $this->addSql('ALTER TABLE back_2018_product DROP INDEX FK_887E3816C53D045F, ADD UNIQUE INDEX UNIQ_887E3816C53D045F (image)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_Image ADD id_product INT NOT NULL');
        $this->addSql('ALTER TABLE back_2018_Product DROP INDEX UNIQ_887E3816C53D045F, ADD INDEX FK_887E3816C53D045F (image)');
    }
}
