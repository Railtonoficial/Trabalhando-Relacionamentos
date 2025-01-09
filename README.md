<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# OLX Backend

Este projeto é uma API para um sistema de anúncios, desenvolvida utilizando o framework Laravel. Ele inclui funcionalidades de cadastro de usuários, autenticação, e relacionamentos entre anúncios, categorias, estados e usuários.

## Tecnologias Utilizadas

- **PHP 8.3**
- **Laravel 10**
- **Sanctum** para autenticação via tokens
- **MySQL** para banco de dados
- **Docker e Docker Compose** para gerenciamento do ambiente

## Funcionalidades Implementadas

1. **Cadastro e Autenticação de Usuários**
   - Usuários podem se registrar com nome, email, senha e estado de residência.
   - Autenticação via tokens utilizando Laravel Sanctum.
   - Validação de dados através de `FormRequest`.

2. **Gerenciamento de Anúncios**
   - Anúncios podem ser criados e relacionados a categorias, estados e usuários.
   - Modelos estabelecem os relacionamentos:
     - Um **usuário** pode criar vários anúncios.
     - Um **anúncio** pertence a uma categoria, estado e usuário.
     - Uma **categoria** pode conter vários anúncios.
     - Um **estado** pode conter vários anúncios e usuários.

3. **Listagem de Dados**
   - Endpoints para listar categorias e estados disponíveis.

## Estrutura do Código

### Controllers

- **CategoriesController**: Retorna todas as categorias disponíveis.
- **StatesController**: Retorna todos os estados disponíveis.
- **UserController**:
  - `signup`: Registra um novo usuário.
  - `signin`: Realiza login e retorna um token.
  - `me`: Retorna os detalhes do usuário autenticado, incluindo seus anúncios.

### Models

- **User**:
  - Relacionado a `State` e `Advertise`.
- **Advertise**:
  - Relacionado a `Category`, `State` e `User`.
- **Category**:
  - Relacionado a vários `Advertise`.
- **State**:
  - Relacionado a vários `Advertise` e `User`.

### Requests

- **CreateUserRequest**:
  - Valida os dados enviados ao registrar um usuário.
- **SignInRequest**:
  - Valida os dados enviados para autenticação.

### Relacionamentos

- **User**
  - Pertence a um estado.
  - Possui vários anúncios.
- **Advertise**
  - Pertence a uma categoria, estado e usuário.
- **Category**
  - Possui vários anúncios.
- **State**
  - Possui vários anúncios e usuários.
