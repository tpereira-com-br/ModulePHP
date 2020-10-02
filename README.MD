# ModulePHP

ModulePHP é um framework PHP para programação modular em MVC-AJAX, orientado a objetos, com acesso de usuário multinível e criação automática de rotas.


## Como utilizar?

Para utilizar o ModulePHP é necessário ter instalado PHP 7.x (ou superior) e MySQL 5.7 (ou superior), certificado SSL de Validação do Domínio (é possível desabilitar a necessidade configurando o .htaccess dentro da pasta public).

Tendo instalados os requisitos acima basta apontar a raiz do servidor para a pasta "public".




## Como criar uma rota?

Para criação de rotas de acesso público basta criar um arquivo PHP dentro da pasta "view/pages/free".

Para criar um nível de acesso restrito basta criar uma pasta dentro da pasta "view/pages", o nome da pasta deve ser igual ao nome do nível de acesso depois basta criar arquivos dentro dessa pasta que as rotas para aquele nível de acesso são criadas automaticamente.