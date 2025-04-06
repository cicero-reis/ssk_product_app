# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant Service as ProductService
    participant DB as Database

    Cliente->>API: POST /api/v1/products (JSON com dados do produto)
    API->>Service: Validar e processar dados
    Service->>DB: Inserir novo produto
    DB-->>Service: Produto criado
    Service-->>API: Retornar objeto Produto
    API-->>Cliente: 201 Created + JSON do produto

