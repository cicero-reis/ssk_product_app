# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant DB as Database

    Cliente->>API: DELETE /api/v1/products/{id}
    API->>DB: Verificar existência do produto
    alt Produto encontrado
        DB->>DB: Remover produto
        DB-->>API: Confirmação
        API-->>Cliente: 204 No Content
    else Produto não encontrado
        API-->>Cliente: 404 Not Found
    end
