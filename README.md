
---

## 🚀 Configuração do Ambiente com Docker para WordPress 🐳

Este repositório fornece uma configuração de ambiente com Docker para executar o WordPress de forma isolada em contêineres separados para PHP, servidor web (Apache) e WordPress em si.

### Estrutura do Projeto 📁

O projeto segue a seguinte estrutura de diretórios:

```
project/
├── php/
│   └── Dockerfile
├── apache/
│   └── Dockerfile
├── wordpress/
│   ├── Dockerfile
│   └── wordpress_files/
└── docker-compose.yml
```

### Configuração dos Contêineres 🛠️

- **Contêiner PHP** 🐘: Responsável por executar o PHP. Você pode adicionar qualquer configuração adicional do PHP neste contêiner.

- **Contêiner do Servidor Web (Apache)** 🌐: Hospeda o servidor web (como Apache ou Nginx) e serve os arquivos do WordPress.

- **Contêiner do WordPress** 📦: Contém os arquivos do WordPress e é montado pelo contêiner do servidor web.

### Como Usar 📋

1. Clone este repositório:

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

2. Navegue até o diretório clonado:

   ```bash
   cd seu-repositorio
   ```

3. Inicie os contêineres:

   ```bash
   docker-compose up --build -d
   ```

4. Acesse o WordPress em seu navegador:

   [http://localhost:8080](http://localhost:8080)

### Observações Importantes ℹ️

- Certifique-se de que as portas necessárias não estão sendo utilizadas por outros serviços.
- Você pode modificar as configurações dos contêineres conforme necessário para atender aos seus requisitos específicos.

---

Sinta-se à vontade para adicionar mais detalhes ou personalizar conforme necessário. Espero que isso ajude! 🌟