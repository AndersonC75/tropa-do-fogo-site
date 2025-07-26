import { Button } from "@/components/ui/button";
import { Users, Zap, Crown } from "lucide-react";
import heroImage from "@/assets/gta-hero.jpg";

const Hero = () => {
  return (
    <section id="home" className="relative min-h-screen flex items-center justify-center overflow-hidden">
      <div 
        className="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style={{ backgroundImage: `url(${heroImage})` }}
      />
      <div className="absolute inset-0 bg-gradient-to-b from-background/20 via-background/60 to-background/90" />
      
      <div className="relative z-10 container mx-auto px-4 text-center">
        <div className="max-w-4xl mx-auto">
          <h1 className="text-6xl md:text-8xl font-bold mb-6">
            <span className="bg-gradient-orange bg-clip-text text-transparent">
              TROPA DO
            </span>
            <br />
            <span className="text-foreground">FOGO AMIGO</span>
          </h1>
          
          <p className="text-xl md:text-2xl text-muted-foreground mb-8 max-w-2xl mx-auto">
            A comunidade de gamers mais explosiva do Brasil! 
            Entre na nossa gang e dominem as ruas virtuais juntos.
          </p>
          
          <div className="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <Button size="lg" className="bg-gradient-orange hover:shadow-glow transition-all text-lg px-8 py-6">
              <Users className="w-5 h-5 mr-2" />
              Entrar na Tropa
            </Button>
            <Button size="lg" variant="outline" className="border-primary text-primary hover:bg-primary hover:text-primary-foreground text-lg px-8 py-6">
              <Zap className="w-5 h-5 mr-2" />
              Ver Eventos
            </Button>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
            <div className="bg-gradient-card p-6 rounded-lg border border-border shadow-intense">
              <Users className="w-12 h-12 text-primary mb-4 mx-auto" />
              <h3 className="text-xl font-bold mb-2">500+ Membros</h3>
              <p className="text-muted-foreground">Uma comunidade ativa e engajada</p>
            </div>
            
            <div className="bg-gradient-card p-6 rounded-lg border border-border shadow-intense">
              <Zap className="w-12 h-12 text-primary mb-4 mx-auto" />
              <h3 className="text-xl font-bold mb-2">Eventos Diários</h3>
              <p className="text-muted-foreground">Missões, rachas e muito mais</p>
            </div>
            
            <div className="bg-gradient-card p-6 rounded-lg border border-border shadow-intense">
              <Crown className="w-12 h-12 text-primary mb-4 mx-auto" />
              <h3 className="text-xl font-bold mb-2">Crew Oficial</h3>
              <p className="text-muted-foreground">Reconhecimento no GTA Online</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Hero;