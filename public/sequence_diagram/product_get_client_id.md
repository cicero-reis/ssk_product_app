# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant DB as Database

    Cliente->>API: GET /api/v2/products/{id}/client
    API->>DB: Buscar produtos pelo client_id
    alt Cliente encontrado
        DB-->>API: Lista de produtos
        API-->>Cliente: 200 OK + Lista
    else Cliente não encontrado
        API-->>Cliente: 404 Not Found
    end
