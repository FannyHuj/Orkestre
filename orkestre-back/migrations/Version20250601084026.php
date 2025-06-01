<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250601084026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE evenement ADD organizer_id_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evenement ADD CONSTRAINT FK_B26681EE78C696A FOREIGN KEY (organizer_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B26681EE78C696A ON evenement (organizer_id_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD password VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD phone_number INT DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP password
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP phone_number
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evenement DROP CONSTRAINT FK_B26681EE78C696A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_B26681EE78C696A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE evenement DROP organizer_id_id
        SQL);
    }
}
