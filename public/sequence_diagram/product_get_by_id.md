# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant DB as Database

    Cliente->>API: GET /api/v1/products/{id}
    API->>DB: Buscar produto pelo ID
    alt Produto encontrado
        DB-->>API: Produto
        API-->>Cliente: 200 OK + Produto
    else Produto não encontrado
        DB-->>API: null
        API-->>Cliente: 404 Not Found
    end
