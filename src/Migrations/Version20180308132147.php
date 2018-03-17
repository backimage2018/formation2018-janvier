<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180308132147 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_review ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE back_2018_review ADD CONSTRAINT FK_93D127794584665A FOREIGN KEY (product_id) REFERENCES back_2018_Product (id)');
        $this->addSql('CREATE INDEX IDX_93D127794584665A ON back_2018_review (product_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back_2018_Review DROP FOREIGN KEY FK_93D127794584665A');
        $this->addSql('DROP INDEX IDX_93D127794584665A ON back_2018_Review');
        $this->addSql('ALTER TABLE back_2018_Review DROP product_id');
    }
}
