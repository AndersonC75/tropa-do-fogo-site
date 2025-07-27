#!/usr/bin/env python3
"""
Script para criar um arquivo ZIP do tema WordPress TDFA
"""

import zipfile
import os
from pathlib import Path

def create_theme_zip():
    # Nome do arquivo ZIP
    zip_filename = "tdfa-wordpress-theme.zip"
    
    # Pasta do tema
    theme_folder = "wordpress-theme"
    
    # Criar o arquivo ZIP
    with zipfile.ZipFile(zip_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        # Percorrer todos os arquivos na pasta do tema
        for root, dirs, files in os.walk(theme_folder):
            for file in files:
                file_path = os.path.join(root, file)
                # Adicionar arquivo ao ZIP mantendo a estrutura de pastas
                arcname = os.path.relpath(file_path, theme_folder)
                zipf.write(file_path, arcname)
                print(f"Adicionado: {arcname}")
    
    print(f"\n✅ Arquivo ZIP criado: {zip_filename}")
    print(f"📁 Tamanho: {os.path.getsize(zip_filename)} bytes")
    
    # Instruções de instalação
    print("\n📋 INSTRUÇÕES DE INSTALAÇÃO:")
    print("1. Faça login no painel administrativo do WordPress")
    print("2. Vá em Aparência > Temas")
    print("3. Clique em 'Adicionar Novo'")
    print("4. Clique em 'Enviar Tema'")
    print(f"5. Selecione o arquivo '{zip_filename}'")
    print("6. Clique em 'Instalar Agora'")
    print("7. Ative o tema após a instalação")
    
    print("\n⚠️  IMPORTANTE:")
    print("- Substitua o logo em assets/images/logo.png")
    print("- Configure o Custom Logo em Aparência > Personalizar")
    print("- Crie as páginas 'Jogos' e 'Notícias'")
    print("- Adicione conteúdo nos Custom Post Types")

if __name__ == "__main__":
    create_theme_zip()