<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508120143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produits_client_produit (produits_client_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_37F29D7271C9EC21 (produits_client_id), INDEX IDX_37F29D72F347EFB (produit_id), PRIMARY KEY(produits_client_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits_client_produit ADD CONSTRAINT FK_37F29D7271C9EC21 FOREIGN KEY (produits_client_id) REFERENCES produits_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_client_produit ADD CONSTRAINT FK_37F29D72F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD image VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits_client_produit DROP FOREIGN KEY FK_37F29D7271C9EC21');
        $this->addSql('ALTER TABLE produits_client_produit DROP FOREIGN KEY FK_37F29D72F347EFB');
        $this->addSql('DROP TABLE produits_client_produit');
        $this->addSql('ALTER TABLE produit DROP image, DROP created_at');
    }
}
