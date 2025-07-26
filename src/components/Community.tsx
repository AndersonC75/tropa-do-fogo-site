import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { MessageSquare, Calendar, Trophy, Shield } from "lucide-react";

const Community = () => {
  return (
    <section id="community" className="py-20 bg-gradient-hero">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">
            <span className="bg-gradient-orange bg-clip-text text-transparent">
              Nossa Comunidade
            </span>
          </h2>
          <p className="text-xl text-muted-foreground max-w-3xl mx-auto">
            Mais que uma crew, somos uma família. Conheça os pilares que sustentam a TDFA.
          </p>
        </div>
        
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
          <Card className="bg-gradient-card border-border hover:shadow-glow transition-all">
            <CardHeader className="text-center">
              <MessageSquare className="w-12 h-12 text-primary mx-auto mb-4" />
              <CardTitle>Discord Ativo</CardTitle>
              <CardDescription>
                Chat 24/7 com canais para todos os gostos
              </CardDescription>
            </CardHeader>
          </Card>
          
          <Card className="bg-gradient-card border-border hover:shadow-glow transition-all">
            <CardHeader className="text-center">
              <Calendar className="w-12 h-12 text-primary mx-auto mb-4" />
              <CardTitle>Eventos Regulares</CardTitle>
              <CardDescription>
                Missões especiais, competições e encontros
              </CardDescription>
            </CardHeader>
          </Card>
          
          <Card className="bg-gradient-card border-border hover:shadow-glow transition-all">
            <CardHeader className="text-center">
              <Trophy className="w-12 h-12 text-primary mx-auto mb-4" />
              <CardTitle>Competições</CardTitle>
              <CardDescription>
                Torneios internos e rankings de performance
              </CardDescription>
            </CardHeader>
          </Card>
          
          <Card className="bg-gradient-card border-border hover:shadow-glow transition-all">
            <CardHeader className="text-center">
              <Shield className="w-12 h-12 text-primary mx-auto mb-4" />
              <CardTitle>Ambiente Seguro</CardTitle>
              <CardDescription>
                Moderação ativa e regras claras
              </CardDescription>
            </CardHeader>
          </Card>
        </div>
        
        <div className="bg-gradient-card p-8 rounded-lg border border-border shadow-intense">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
              <h3 className="text-3xl font-bold mb-4 text-primary">
                Pronto para entrar na ação?
              </h3>
              <p className="text-lg text-muted-foreground mb-6">
                Junte-se a centenas de jogadores que já fazem parte da melhor crew do GTA Online. 
                Nossa comunidade está sempre crescendo e sempre há espaço para mais um membro leal.
              </p>
              <Button className="bg-gradient-orange hover:shadow-glow transition-all text-lg px-8 py-3">
                <MessageSquare className="w-5 h-5 mr-2" />
                Entrar no Discord Agora
              </Button>
            </div>
            
            <div className="space-y-4">
              <div className="flex items-center space-x-4 p-4 bg-background/20 rounded-lg">
                <div className="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                  <span className="text-primary-foreground font-bold">1</span>
                </div>
                <div>
                  <h4 className="font-semibold">Entre no Discord</h4>
                  <p className="text-sm text-muted-foreground">Acesse nosso servidor oficial</p>
                </div>
              </div>
              
              <div className="flex items-center space-x-4 p-4 bg-background/20 rounded-lg">
                <div className="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                  <span className="text-primary-foreground font-bold">2</span>
                </div>
                <div>
                  <h4 className="font-semibold">Leia as Regras</h4>
                  <p className="text-sm text-muted-foreground">Conheça nossa conduta</p>
                </div>
              </div>
              
              <div className="flex items-center space-x-4 p-4 bg-background/20 rounded-lg">
                <div className="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                  <span className="text-primary-foreground font-bold">3</span>
                </div>
                <div>
                  <h4 className="font-semibold">Comece a Jogar</h4>
                  <p className="text-sm text-muted-foreground">Participe dos eventos e missões</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Community;