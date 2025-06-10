<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250610191651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D05573A630
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D0CCF2FB2E
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
