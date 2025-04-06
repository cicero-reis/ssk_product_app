# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant DB as Database

    Cliente->>API: GET /api/v2/products/{categoryId}/category
    API->>DB: Buscar produtos pela categoria
    alt Categoria encontrada
        DB-->>API: Lista de produtos
        API-->>Cliente: 200 OK + Lista
    else Categoria não encontrada
        API-->>Cliente: 404 Not Found
    end
