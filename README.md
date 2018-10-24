# Transp-u

Transp-u é um projeto simples feito em Angular.io (v6) utilizando uma API desenvolvida em PHP 7, com banco de dados MySQL

## Do quê se trata?

Transp-u é um app simples de cadastro e consulta em uma plataforma simplificada de aplicativos de corridas compartilhadas. Podem-se cadastrar motoristas, passageiros e as corridas entre eles.

### Pré-requisitos

* Servidor Apache com PHP 7 ou superior instalado *
* MySQL instalado *
* Angular 6 ou superior instalado

 \* *testado e desenvolvido com [XAMPP](https://www.apachefriends.org/download.html)*

## Instalação

Após cumpridos os requisitos iniciais, navegue até a raiz do projeto.


```
LucasSouza_teste\
```

Nesta pasta, você verá um arquivo ```instal.php```.

Caso esteja utilizando XAMPP, copie a pasta do projeto para a pasta ```htdocs``` e navegue até:


 ```
 http://localhost/LucasSouza_teste/install.php
 ```


Isso instalará o banco de dados MySQL (já populado).

Feito isso, o próximo passo é iniciar o servidor Angular.

Na pasta ```LucasSouza_teste\transp-u```, inicie o terminal e execute:


```
npm install @angular-devkit/build-angular
```

Então:


```
ng build
```


E em seguida:


```
ng serve
```


Isso compilará o código e iniciará o servidor Angular em:


```
http://localhost:4200/
```

*A porta :4200 é o padrão. Caso tenha alterado, adaptar para a porta utilizada*

Feito isso, o projeto deve estar funcionando corretamente.

*Caso esteja utilizando outro servidor apache e a URL da API não for* ```http://localhost/LucasSouza_teste/api``` *será necessário alterar a URL da API em:*


```
LucasSouza_teste\transp-u\src\app\app.api.ts
```



## Feito com

* [Atom](https://atom.io/) - IDE utilizada
* [XAMPP](https://www.apachefriends.org/download.html) - Pacote de distribuição APACHE

## Autores

* **[Lucas Souza](https://github.com/LucasPCS)**

### Nota

Por um déficit de harware, tive que utilizar servidores diferentes em portas diferentes. Por esse motivo, os navegadores modernos impedem a conexão de alguns componentes, o que gera erros de CORS (Cross-origin resource sharing). Isto posto, a solução temporária que encontrei, foi forçar que o navegador desabilite esta função.

Para o Chrome no Windows, é possível criar um atalho do Chrome e ao final do caminho, adicionar o seguinte argumento:


```
"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --user-data-dir="C:/Chrome dev session" --disable-web-security
```


**Importante!**

Isso desabilita uma série de medidas de segurança do navegador, e só deve ser usado para a execução do projeto.

Para saber mais:
* [Disable same origin policy in Chrome](https://stackoverflow.com/questions/3102819/disable-same-origin-policy-in-chrome)
* [Disable firefox same origin policy](https://stackoverflow.com/questions/17088609/disable-firefox-same-origin-policy)
