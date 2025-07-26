import { Button } from "@/components/ui/button";
import { Users, Gamepad2, MessageSquare } from "lucide-react";

const Header = () => {
  return (
    <header className="fixed top-0 w-full z-50 bg-background/90 backdrop-blur-md border-b border-border">
      <div className="container mx-auto px-4 py-4 flex items-center justify-between">
        <div className="flex items-center space-x-2">
          <div className="text-2xl font-bold bg-gradient-orange bg-clip-text text-transparent">
            TDFA
          </div>
          <div className="hidden md:block text-muted-foreground">
            Tropa do Fogo Amigo
          </div>
        </div>
        
        <nav className="hidden md:flex items-center space-x-8">
          <a href="/" className="text-foreground hover:text-primary transition-colors">
            Início
          </a>
          <a href="#community" className="text-foreground hover:text-primary transition-colors">
            Comunidade
          </a>
          <a href="/jogos" className="text-foreground hover:text-primary transition-colors">
            Jogos Grátis
          </a>
          <a href="/noticias" className="text-foreground hover:text-primary transition-colors">
            Notícias
          </a>
          <a href="#events" className="text-foreground hover:text-primary transition-colors">
            Eventos
          </a>
        </nav>
        
        <Button variant="default" className="bg-gradient-orange hover:shadow-glow transition-all">
          <MessageSquare className="w-4 h-4 mr-2" />
          Entrar no Discord
        </Button>
      </div>
    </header>
  );
};

export default Header;