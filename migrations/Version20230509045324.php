<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509045324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD le_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC0F37DD6 FOREIGN KEY (le_client_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC0F37DD6 ON commande (le_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC0F37DD6');
        $this->addSql('DROP INDEX IDX_6EEAA67DC0F37DD6 ON commande');
        $this->addSql('ALTER TABLE commande DROP le_client_id');
    }
}
