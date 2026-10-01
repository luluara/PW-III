# CRUD Mundo

## Sobre o projeto

O CRUD Mundo é um sistema web desenvolvido para realizar o gerenciamento de informações relacionadas a países, cidades, continentes e governantes. O projeto permite cadastrar, consultar, alterar e excluir informações, além de possuir um sistema de login com diferentes níveis de acesso para os usuários.

## Funcionalidades

- Cadastro, consulta, alteração e exclusão de países.
- Cadastro, consulta, alteração e exclusão de cidades.
- Cadastro, consulta, alteração e exclusão de continentes.
- Cadastro, consulta, alteração e exclusão de governantes.
- Sistema de login.
- Controle de usuários por nível hierárquico.
- Alteração de senha.
- Recuperação de senha.
- Banco de dados integrado ao sistema.

## Tecnologias utilizadas

| Camada | Tecnologia |
|--------|------------|
| Front-end | HTML, CSS, JavaScript |
| Back-end | PHP |
| Banco de Dados | MySQL |
| Controle de Versão | GitHub |

## Estrutura do projeto

Os principais arquivos do projeto são:

- `index.php` — página inicial do sistema.
- `login.php` — tela de login.
- `logout.php` — encerra a sessão do usuário.
- `bd_mundo.sql` — arquivo para criação e configuração do banco de dados.
- `paises.php` — gerenciamento de países.
- `cidades.php` — gerenciamento de cidades.
- `continentes.php` — gerenciamento de continentes.
- `governantes.php` — gerenciamento de governantes.
- `esquecido_senha.php` — recuperação de senha.
- `redefinir_senha.php` — redefinição de senha.
- `trocar_senha.php` — alteração de senha.
- `alterar_senha.php` — alteração da senha do usuário.
- `gerar_hash.php` — geração de senha criptografada.
- `style.css` — estilos visuais do sistema.


## Como executar

1. Instale o XAMPP.
2. Inicie os serviços **Apache** e **MySQL** no XAMPP.
3. Coloque a pasta `CrudMundo` dentro da pasta `htdocs` do XAMPP.
4. Crie o banco de dados utilizado pelo sistema no MySQL.
5. Importe o arquivo do banco de dados, caso exista.
6. Configure a conexão do projeto com o banco de dados.
7. Abra o navegador e acesse:
http://localhost/CrudMundo


## Autor
Luara Gonçalves de Siqueira Porto
