# Smart Telecom — Sistema de Gestão para Provedores

Projeto desenvolvido como desafio técnico: sistema web em Laravel para gestão de provedores de internet, com times, papéis, geração de contratos e administração avançada.

---

## ✨ Visão Geral

O sistema permite o cadastro, gerenciamento e administração de provedores de internet de forma segura, moderna e responsiva. Cada usuário pertence a um **time**, com permissões e acessos diferenciados (Owner, Membro, Convidado). O sistema contempla:

- Cadastro de provedores com dados validados (CNPJ, endereço via CEP)
- Gerenciamento de planos de internet por provedor/time
- Dashboard administrativo com estatísticas, gráficos e DataTables
- Controle de usuários, papéis e permissões por time
- Geração de contratos fictícios em `.docx` (PHPWord)
- Interface moderna baseada no template Sneat Free
- Experiência do usuário aprimorada e responsiva

---

## 🚀 Funcionalidades

- **Landing Page:** Apresentação da empresa, missão, visão, equipe, FAQ e contato.
- **Autenticação:** Login, cadastro, redefinição de senha, validação de dados e integração com APIs BrasilAPI (CNPJ) e ViaCEP.
- **Gestão de Times:** Isolamento dos dados por time, com papéis: Owner, Membro, Convidado.
- **Planos de Internet:** CRUD de planos vinculado ao provedor/time autenticado, proteção por policies.
- **Administração:** Dashboard exclusivo para administradores, gerenciamento global de usuários e planos, gráficos e DataTables.
- **Geração de Contratos:** Formulário para geração de contrato de prestação de serviços (.docx), preenchido automaticamente.
- **UX e Segurança:** Formulários com validação, feedback visual, mensagens claras e autenticação robusta.

---

## 🛠️ Tecnologias e Bibliotecas

- **Laravel** (versão mais recente)
- **Jetstream** (Teams ativado)
- **Livewire** (componentização reativa)
- **Sneat Free** (template visual)
- **PHPWord** (PhpOffice) — geração de contratos `.docx`
- **BrasilAPI** — consulta CNPJ
- **ViaCEP** — preenchimento automático de endereço
- **TailwindCSS** & **Bootstrap** (layout responsivo)
- **DataTables** (listagens dinâmicas/exportação)
- **MySQL** ou **SQLite** (configurável)

---

## ⚙️ Requisitos e Instalação

### Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL
- Node.js e npm

### Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/Ruan-Jonys/desafio-smart_telecom.git
   cd desafio-smart_telecom
   ```

2. **Instale as dependências PHP:**
   ```bash
   composer install
   ```

3. **Instale as dependências JS:**
   ```bash
   npm install
   npm run build
   ```

4. **Configure o `.env`:**
   - Copie `.env.example` para `.env` e ajuste as variáveis de banco, email e outros conforme seu ambiente.

5. **Rode as migrations e seeders:**
   ```bash
   php artisan migrate --seed
   ```

6. **Inicie o servidor:**
   ```bash
   php artisan serve
   ```
   Acesse: `http://localhost:8000`
---

## 👤 Usuários de Teste

- **Admin**
  - Email: `admin@empresa.com`
  - Senha: `senha123`

- **Provedor**
  - Email: `test@example.com`
  - Senha: `senha123`

---

## 📝 Observações e Boas Práticas

- Isolamento total dos dados por time (cada provedor só vê seus planos)
- Permissões controladas por policies e papéis
- Integração real com APIs externas (CNPJ e CEP)
- Uso de Livewire para experiência reativa
- Segurança: validação back-end e front-end
- Código limpo e organizado seguindo padrões Laravel
- Layout responsivo e adaptado ao Sneat

---

## 📄 Licença

Este projeto utiliza o [MIT License](https://opensource.org/licenses/MIT).

---

## 📫 Contato

Em caso de dúvidas sobre o projeto, abra uma issue ou envie um email para [ruanjonys031207@gmail.com](mailto:ruanjonys031207@gmail.com).
