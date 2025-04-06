# Diagrama de Sequência do Microserviço

```mermaid
sequenceDiagram
    actor Cliente
    participant API as Products API
    participant Storage as StorageService
    participant DB as Database

    Cliente->>API: POST /api/v1/products/{id} (arquivo)
    API->>Storage: Salvar imagem
    Storage-->>API: Caminho da imagem
    API->>DB: Atualizar produto com imagem
    DB-->>API: Produto atualizado
    API-->>Cliente: 200 OK + Produto com imagem
