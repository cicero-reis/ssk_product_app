# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant DB as Database

    Cliente->>API: PUT /api/v1/products/{id}
    API->>DB: Verificar existência do produto
    alt Produto encontrado
        DB->>DB: Atualizar dados
        DB-->>API: Produto atualizado
        API-->>Cliente: 200 OK + Produto
    else Produto não encontrado
        API-->>Cliente: 404 Not Found
    end
