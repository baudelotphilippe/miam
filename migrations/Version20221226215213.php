<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221226215213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE ingredients_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE produits_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ingredients (id INT NOT NULL, produits_id INT DEFAULT NULL, recette_id INT DEFAULT NULL, quantite INT NOT NULL, mesure VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4B60114FCD11A2CF ON ingredients (produits_id)');
        $this->addSql('CREATE INDEX IDX_4B60114F89312FE9 ON ingredients (recette_id)');
        $this->addSql('CREATE TABLE produits (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114FCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114F89312FE9 FOREIGN KEY (recette_id) REFERENCES recettes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE ingredients_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produits_id_seq CASCADE');
        $this->addSql('ALTER TABLE ingredients DROP CONSTRAINT FK_4B60114FCD11A2CF');
        $this->addSql('ALTER TABLE ingredients DROP CONSTRAINT FK_4B60114F89312FE9');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE produits');
    }
}
