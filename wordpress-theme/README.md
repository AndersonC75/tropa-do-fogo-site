# TDFA WordPress Theme

## Descrição
Tema personalizado para a comunidade TDFA (Tropa do Fogo Amigo) com temática GTA em cores laranja e preto.

## Características
- Design responsivo inspirado no GTA
- Sistema de notícias personalizado
- Sistema de jogos com avaliações
- Integração com Discord
- Cores personalizáveis (laranja/preto)
- Otimizado para SEO

## Instalação
1. Faça upload do arquivo ZIP através do painel do WordPress
2. Ou extraia os arquivos na pasta `/wp-content/themes/`
3. Ative o tema no painel administrativo
4. Configure o logo personalizado em Aparência > Personalizar

## Configuração Inicial

### 1. Logo
- Vá em Aparência > Personalizar > Identidade do Site
- Faça upload do logo da TDFA

### 2. Menus
- Vá em Aparência > Menus
- Crie um menu e atribua à localização "Primary Menu"

### 3. Páginas Necessárias
Crie as seguintes páginas:
- Jogos (slug: jogos)
- Notícias (slug: noticias)

### 4. Custom Post Types
O tema já inclui:
- **Jogos**: Para listar jogos gratuitos
- **Notícias**: Para artigos da comunidade

## Adicionando Conteúdo

### Jogos
1. Vá em Jogos > Adicionar Novo
2. Preencha:
   - Título do jogo
   - Descrição/excerpt
   - Imagem destacada
   - Categoria
   - Avaliação (1-5)
   - Plataforma
   - Link de download
   - Marcar como "Destacado" (opcional)

### Notícias
1. Vá em Notícias > Adicionar Nova
2. Preencha:
   - Título da notícia
   - Conteúdo completo
   - Imagem destacada
   - Autor
   - Marcar como "Destacado" (opcional)

## Personalização

### Cores
As cores estão definidas no arquivo `style.css` nas variáveis CSS:
- `--primary`: Cor laranja principal
- `--background`: Cor de fundo
- `--foreground`: Cor do texto

### Gradientes
- `--gradient-orange`: Gradiente laranja
- `--gradient-gta`: Gradiente GTA (laranja para preto)

## Funcionalidades

### Páginas Incluídas
- **Página Inicial**: Hero section, comunidade, notícias e jogos em destaque
- **Página de Jogos**: Lista completa de jogos com filtros
- **Página de Notícias**: Todas as notícias da comunidade
- **Single Game**: Página individual do jogo
- **Single News**: Página individual da notícia

### Widgets e Áreas
- Header com logo e navegação
- Footer com links e informações da comunidade

## Suporte
Para suporte e personalizações adicionais, entre em contato através do Discord da TDFA.

## Versão
1.0.0 - Lançamento inicial