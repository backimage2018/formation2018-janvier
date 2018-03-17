<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180306184453 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_product DROP FOREIGN KEY FK_887E3816C53D045F');
        $this->addSql('DROP INDEX UNIQ_887E3816C53D045F ON back_2018_product');
        $this->addSql('ALTER TABLE back_2018_product CHANGE image image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE back_2018_product ADD CONSTRAINT FK_887E38163DA5256D FOREIGN KEY (image_id) REFERENCES back_2018_Image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_887E38163DA5256D ON back_2018_product (image_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_Product DROP FOREIGN KEY FK_887E38163DA5256D');
        $this->addSql('DROP INDEX UNIQ_887E38163DA5256D ON back_2018_Product');
        $this->addSql('ALTER TABLE back_2018_Product CHANGE image_id image INT DEFAULT NULL');
        $this->addSql('ALTER TABLE back_2018_Product ADD CONSTRAINT FK_887E3816C53D045F FOREIGN KEY (image) REFERENCES back_2018_image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_887E3816C53D045F ON back_2018_Product (image)');
    }
}
