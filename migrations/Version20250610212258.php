<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250610212258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categ VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, id_categ_id INT NOT NULL, nom_item VARCHAR(100) NOT NULL, prix_item NUMERIC(10, 0) NOT NULL, image_path VARCHAR(255) DEFAULT NULL, INDEX IDX_7D053A93B8CCB787 (id_categ_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE table_resto (id INT AUTO_INCREMENT NOT NULL, num_table INT NOT NULL, capacite INT NOT NULL, etat_table VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE menu ADD CONSTRAINT FK_7D053A93B8CCB787 FOREIGN KEY (id_categ_id) REFERENCES categorie (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail ADD id_cmd_id INT NOT NULL, ADD id_item_id INT NOT NULL, ADD quantite INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail ADD CONSTRAINT FK_9145B6D05573A630 FOREIGN KEY (id_cmd_id) REFERENCES commande (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail ADD CONSTRAINT FK_9145B6D0CCF2FB2E FOREIGN KEY (id_item_id) REFERENCES menu (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9145B6D05573A630 ON command_detail (id_cmd_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9145B6D0CCF2FB2E ON command_detail (id_item_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DBC24C4C9 FOREIGN KEY (id_table_id) REFERENCES table_resto (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D0CCF2FB2E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DBC24C4C9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93B8CCB787
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categorie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE menu
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE table_resto
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE utilisateur
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D05573A630
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9145B6D05573A630 ON command_detail
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9145B6D0CCF2FB2E ON command_detail
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail DROP id_cmd_id, DROP id_item_id, DROP quantite
        SQL);
    }
}
