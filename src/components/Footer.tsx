import { Button } from "@/components/ui/button";
import { MessageSquare, Globe, Shield, Heart } from "lucide-react";

const Footer = () => {
  return (
    <footer className="bg-gradient-hero border-t border-border">
      <div className="container mx-auto px-4 py-12">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          <div className="col-span-1 md:col-span-2">
            <h3 className="text-2xl font-bold mb-4">
              <span className="bg-gradient-orange bg-clip-text text-transparent">
                Tropa do Fogo Amigo
              </span>
            </h3>
            <p className="text-muted-foreground mb-4 max-w-md">
              A maior e mais ativa comunidade de GTA Online do Brasil. 
              Junte-se a nós e faça parte de algo épico!
            </p>
            <Button className="bg-gradient-orange hover:shadow-glow transition-all">
              <MessageSquare className="w-4 h-4 mr-2" />
              Entrar na Tropa
            </Button>
          </div>
          
          <div>
            <h4 className="font-semibold mb-4 text-primary">Links Rápidos</h4>
            <ul className="space-y-2 text-sm">
              <li>
                <a href="#home" className="text-muted-foreground hover:text-primary transition-colors">
                  Início
                </a>
              </li>
              <li>
                <a href="#community" className="text-muted-foreground hover:text-primary transition-colors">
                  Comunidade
                </a>
              </li>
              <li>
                <a href="#events" className="text-muted-foreground hover:text-primary transition-colors">
                  Eventos
                </a>
              </li>
              <li>
                <a href="#contact" className="text-muted-foreground hover:text-primary transition-colors">
                  Contato
                </a>
              </li>
            </ul>
          </div>
          
          <div>
            <h4 className="font-semibold mb-4 text-primary">Comunidade</h4>
            <ul className="space-y-2 text-sm">
              <li className="flex items-center space-x-2">
                <Globe className="w-4 h-4 text-primary" />
                <span className="text-muted-foreground">tdfa.com.br</span>
              </li>
              <li className="flex items-center space-x-2">
                <MessageSquare className="w-4 h-4 text-primary" />
                <span className="text-muted-foreground">Discord Oficial</span>
              </li>
              <li className="flex items-center space-x-2">
                <Shield className="w-4 h-4 text-primary" />
                <span className="text-muted-foreground">Crew Verificada</span>
              </li>
            </ul>
          </div>
        </div>
        
        <div className="border-t border-border pt-8 text-center">
          <p className="text-muted-foreground text-sm mb-2">
            © 2024 Tropa do Fogo Amigo. Todos os direitos reservados.
          </p>
          <p className="text-muted-foreground text-xs flex items-center justify-center space-x-1">
            <span>Feito com</span>
            <Heart className="w-3 h-3 text-primary" />
            <span>para a melhor comunidade de gamers do Brasil</span>
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;