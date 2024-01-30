# Logigramme
```mermaid
graph TD
    A[start] --> B[get all posts from database]
    B --> C{no blog post ?}
    C -- Yes --> D[display empty disclaimer]
    C-- No --> E[display blog post]
    E --> F{more blogpost?}
    F -- Yes --> E
    F -- No --> G[End]
```
# diagramme de séquence
## de l'affichage de la liste des derniers articles
```mermaid
sequenceDiagram
    User->>index.php: ?action=Accueil
    index.php->>homeController.php: include
    homeController.php->>blogPostData.php: lastBlogPosts()
    blogPostData.php->>PDO: prepare()
    PDO-->>blogPostData.php: PDOStatement
    blogPostData.php->>PDOStatement: execute()
    PDOStatement-->>blogPostData.php: isSuccess
    blogPostData.php->>PDOStatement: fetchAll()
    PDOStatement-->>blogPostData.php: blogPosts
    blogPostData.php-->>homeController.php: blogPosts
    homeController.php->>home.tpl.php: blogPosts
    home.tpl.php -->>User: display blogPosts
```
## de l'affichage d'une page Article avec des infos et des commentaires
```mermaid
sequenceDiagram
    User->>index.php: ?action=blogPost
    index.php->>blogPostController.php: include
    blogPostController.php->>blogPostData.php: oneArticle()
    blogPostData.php->>PDO: prepare()
    PDO-->>blogPostData.php: PDOStatement
    blogPostData.php->>PDOStatement: execute()
    PDOStatement-->>blogPostData.php: isSuccess
    blogPostData.php->>PDOStatement: fetchAll()
    PDOStatement-->>blogPostData.php: oneBlogPost
    blogPostData.php-->>blogPostController.php: oneBlogPost
    blogPostController.php->>blogPost.tpl.php: oneBlogPost
    blogPost.tpl.php -->>User: display oneBlogPost
```
## de la création d'un article
```mermaid
sequenceDiagram
    User->>index.php: ?action=blogPostCreate
    index.php->>blogPostCreateController.php: include
    blogPostCreateController.php->>blogPostData.php: blogPostCreate()
    blogPostData.php->>PDO: prepare()
    PDO-->>blogPostData.php: PDOStatement
    blogPostData.php->>PDOStatement: execute()
    PDOStatement-->>blogPostData.php: isSuccess
    blogPostData.php->>PDOStatement: fetchAll()
    PDOStatement-->>blogPostData.php: oneNewBlogPost
    blogPostData.php-->>blogPostCreateController.php: oneNewBlogPost
    blogPostCreateController.php->>blogPostCreate.tpl.php: oneNewBlogPost
    blogPostCreate.tpl.php -->>User: display oneNewBlogPost
```