<?php 
namespace Fragments\Lib\Database;
use PDO;
final class Database
{
    public function __construct(private PDO $pdo) {}

    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
