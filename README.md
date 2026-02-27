<div align="center">
  <h1 align="center">🐘 PHP E-Commerce & CRUD</h1>
  <p align="center">
    <strong>Um sistema completo de Gestão de Usuários, Produtos e Carrinho de Compras em PHP Nativo e MySQL.</strong>
  </p>
  <p align="center">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap" />
  </p>
</div>

<hr />

## 📖 Sobre o Projeto

O **PHP E-Commerce & CRUD** é uma aplicação Full-Stack desenvolvida puramente em **PHP**, sem a abstração de *frameworks* de mercado como Laravel ou Symfony. 

O projeto foi criado para consolidar e demonstrar habilidades em **Back-End Tradicional**, comunicação e modelagem de banco de dados relacional (**MySQL**), persistência de sessões de usuário e fundamentos do padrão de arquitetura **MVC** (Model-View-Controller).

O sistema gere usuários autenticados, onde é possível visualizar, criar, atualizar e deletar (*CRUD*) um catálogo de produtos consumível por um Carrinho de Compras dinâmico.

---

## 🚀 Funcionalidades

- **Sistema de Autenticação (`login.php` / `logout.php`)**: Gestão de autorização e *Sessions*, protegendo rotas críticas (*dashboards*).
- **CRUD de Usuários e Produtos**: Cadastro completo e administração na base de dados (Create, Read, Update, Delete) com interfaces dedicadas (`usuarios_cadastro.php`, `produtos_cadastro.php`).
- **Carrinho de Compras (`shopcart.php`)**: Módulo de *E-commerce* que processa itens, acumula valores de pedido, manipula finalização financeira e direciona os estados transacionais (`shopcart_sucesso_compra.php`, `shopcart_erro_compra.php`).
- **Design Web Responsivo**: Interface limpa e responsiva desenhada agilmente com a biblioteca CSS **Bootstrap 4**.

---

## 🛠️ Stack Tecnológica e Recursos

| Tecnologia | Descrição |
| :--- | :--- |
| **[PHP (Hypertext Preprocessor)](https://www.php.net/)** | Linguagem *Server-Side* atuando como controle central do ecossistema. |
| **[MySQL / MariaDB](https://www.mysql.com/)** | Banco de dados transacional e relacional onde as Tabelas vivem. |
| **[MySQLi (PHP Extension)](https://www.php.net/manual/en/book.mysqli.php)** | Abstração orientada a objetos da biblioteca nativa para chamadas de banco e `Prepared Statements`. |
| **[Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)** | Componentização ágil da *View* (Front-end). |

---

## 🏗️ Como Executar o Projeto Localmente

Por depender de um banco de dados e de um servidor PHP, recomenda-se o uso de pacotes locais unificados como **XAMPP**, **WAMP** ou **Laragon**.

### Pré-requisitos
- Ter o **XAMPP / WAMP** instalado na máquina.
- Ambiente preparado com `Apache` (Servidor Web) e `MySQL` rodando.

### Passos de Instalação

1. Cole a pasta deste projeto (`crudphp`) no diretório público do seu servidor.
   - Padrão do XAMPP: `C:\xampp\htdocs\crudphp`
   - Padrão do WAMP: `C:\wamp64\www\crudphp`
2. **Setup do Banco de Dados**:
   - Abra o `phpMyAdmin` (*http://localhost/phpmyadmin*).
   - Crie um banco de dados vazio chamado **`crudphp`**.
   - Importe o arquivo de *dump* SQL para criar as tabelas base. (Verifique o arquivo `.sql` na raiz do projeto - ex: `fa4c6b92a4b6fa89c0bb7f581493e3aa.sql`).
3. **Configure as Credenciais**:
   - Se sua senha raíz (`root`) local *não for vazia*, ajuste as configurações de conexão no arquivo **`db.php`** antes de prosseguir.
4. Acesse pelo Navegador: `http://localhost/crudphp` para ver a tela inicial de Login.

---

## 👨‍💻 Avaliados por Tech Recruiters: O que observar?

Ao checarem os arquivos fonte deste repositório, os recrutadores perceberão conhecimento forte em conceitos vitais para Backend:

1. **Prevenção Ostensiva contra SQL Injection (Segurança)**: O projeto não faz concatenação primitiva nas Queries. Utiliza ativamente o pilar do `$stmt = $conn->prepare()` somado ao `$stmt->bind_param()`, evidenciado nos *Controllers* (`usuarios_controller.php`, `produtos_controller.php`), blindando o sistema contra ataques cibernéticos em forms.
2. **Organização Base MVC**: Embora seja PHP Puro (Vanilla), a organização lógica separa de forma declarativa as rotinas de Apresentação (ex: `index.php`, com marcação mista) dos Controladores isolados com regras de banco (`shopcart_controller.php`), trazendo facilidade de leitura.
3. **Code Reuse e Composição (Dry Principle)**: Uso frequente do `include` (`header.php` / `footer.php`) mitigando duplicação de escopo HTML e importando a conexão de Database atômica centralizada (`db.php`).

Fique à vontade para checar os diretórios e analisar a montagem arquitetural!

---
> Desenvolvido com ☕ abordando fundamentos vitais do ecossistema e-commerce em PHP.
