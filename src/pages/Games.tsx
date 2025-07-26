import Header from "@/components/Header";
import Footer from "@/components/Footer";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { ExternalLink, Star, Download, Gamepad2 } from "lucide-react";

const Games = () => {
  const freeGames = [
    {
      title: "GTA Online",
      description: "O jogo principal da nossa comunidade - mundo aberto com missões cooperativas",
      category: "Ação/Aventura",
      rating: 4.5,
      platform: "PC, PlayStation, Xbox",
      image: "🎮",
      link: "#",
      featured: true
    },
    {
      title: "Rocket League",
      description: "Futebol com carros - perfeito para competições entre membros da crew",
      category: "Esportes",
      rating: 4.8,
      platform: "Multiplataforma",
      image: "🚗",
      link: "#",
      featured: false
    },
    {
      title: "Among Us",
      description: "Dedução social - ótimo para eventos especiais da comunidade",
      category: "Social",
      rating: 4.3,
      platform: "Multiplataforma",
      image: "👤",
      link: "#",
      featured: false
    },
    {
      title: "Fall Guys",
      description: "Battle royale divertido - eventos casuais e relaxantes",
      category: "Party Game",
      rating: 4.1,
      platform: "Multiplataforma",
      image: "🏃",
      link: "#",
      featured: false
    },
    {
      title: "CS2 (Counter-Strike 2)",
      description: "FPS competitivo - para os membros que gostam de tiro tático",
      category: "FPS",
      rating: 4.6,
      platform: "PC",
      image: "🔫",
      link: "#",
      featured: true
    },
    {
      title: "Fortnite",
      description: "Battle royale popular - eventos especiais ocasionais",
      category: "Battle Royale",
      rating: 4.2,
      platform: "Multiplataforma",
      image: "🏗️",
      link: "#",
      featured: false
    }
  ];

  const renderStars = (rating: number) => {
    return Array.from({ length: 5 }, (_, i) => (
      <Star
        key={i}
        className={`w-4 h-4 ${i < Math.floor(rating) ? 'text-primary fill-current' : 'text-muted-foreground'}`}
      />
    ));
  };

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-20 bg-gradient-hero">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-6xl font-bold mb-6">
              <span className="bg-gradient-orange bg-clip-text text-transparent">
                Jogos Grátis
              </span>
            </h1>
            <p className="text-xl text-muted-foreground max-w-3xl mx-auto mb-8">
              Descubra os melhores jogos gratuitos que nossa comunidade joga juntos. 
              Desde GTA Online até outros títulos que fazem sucesso na TDFA.
            </p>
            <div className="flex items-center justify-center space-x-2 text-muted-foreground">
              <Gamepad2 className="w-5 h-5 text-primary" />
              <span>Todos os jogos são gratuitos para jogar</span>
            </div>
          </div>
        </section>

        {/* Featured Games */}
        <section className="py-16 bg-background">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-2 text-center">
              <span className="text-primary">Jogos em Destaque</span>
            </h2>
            <p className="text-muted-foreground text-center mb-12">
              Os favoritos da nossa comunidade
            </p>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
              {freeGames.filter(game => game.featured).map((game, index) => (
                <Card key={index} className="bg-gradient-card border-border hover:shadow-glow transition-all">
                  <CardHeader>
                    <div className="flex items-start justify-between">
                      <div className="flex items-center space-x-4">
                        <div className="text-4xl">{game.image}</div>
                        <div>
                          <CardTitle className="text-xl mb-1">{game.title}</CardTitle>
                          <div className="flex items-center space-x-2 mb-2">
                            <div className="flex items-center space-x-1">
                              {renderStars(game.rating)}
                            </div>
                            <span className="text-sm text-muted-foreground">({game.rating})</span>
                          </div>
                          <Badge className="bg-primary/20 text-primary border-primary/30">
                            {game.category}
                          </Badge>
                        </div>
                      </div>
                    </div>
                  </CardHeader>
                  
                  <CardContent>
                    <CardDescription className="text-base mb-4">
                      {game.description}
                    </CardDescription>
                    
                    <div className="flex items-center justify-between">
                      <div className="text-sm text-muted-foreground">
                        <span className="font-medium">Plataforma:</span> {game.platform}
                      </div>
                      <Button className="bg-gradient-orange hover:shadow-glow transition-all">
                        <ExternalLink className="w-4 h-4 mr-2" />
                        Jogar Agora
                      </Button>
                    </div>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* All Games */}
        <section className="py-16 bg-gradient-hero">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-2 text-center">
              <span className="text-primary">Todos os Jogos</span>
            </h2>
            <p className="text-muted-foreground text-center mb-12">
              Biblioteca completa de jogos da comunidade
            </p>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              {freeGames.map((game, index) => (
                <Card key={index} className="bg-gradient-card border-border hover:shadow-glow transition-all">
                  <CardHeader className="pb-4">
                    <div className="flex items-center justify-between mb-3">
                      <div className="text-3xl">{game.image}</div>
                      {game.featured && (
                        <Badge className="bg-gradient-orange">
                          Destaque
                        </Badge>
                      )}
                    </div>
                    <CardTitle className="text-lg">{game.title}</CardTitle>
                    <div className="flex items-center space-x-2">
                      <div className="flex items-center space-x-1">
                        {renderStars(game.rating)}
                      </div>
                      <span className="text-sm text-muted-foreground">({game.rating})</span>
                    </div>
                  </CardHeader>
                  
                  <CardContent>
                    <CardDescription className="mb-4">
                      {game.description}
                    </CardDescription>
                    
                    <div className="space-y-3">
                      <Badge variant="outline" className="border-primary/30 text-primary">
                        {game.category}
                      </Badge>
                      
                      <div className="text-sm text-muted-foreground">
                        <strong>Plataforma:</strong> {game.platform}
                      </div>
                      
                      <Button size="sm" className="w-full bg-gradient-orange hover:shadow-glow transition-all">
                        <Download className="w-4 h-4 mr-2" />
                        Baixar Grátis
                      </Button>
                    </div>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* Community Call to Action */}
        <section className="py-16 bg-background">
          <div className="container mx-auto px-4">
            <div className="bg-gradient-card p-8 rounded-lg border border-border shadow-intense max-w-4xl mx-auto text-center">
              <h3 className="text-2xl font-bold mb-4 text-primary">
                Quer sugerir um novo jogo?
              </h3>
              <p className="text-lg text-muted-foreground mb-6">
                Nossa comunidade está sempre aberta a novos jogos! Se você conhece algum jogo gratuito 
                interessante que a TDFA deveria experimentar, nos avise no Discord.
              </p>
              <Button className="bg-gradient-orange hover:shadow-glow transition-all">
                <ExternalLink className="w-4 h-4 mr-2" />
                Sugerir no Discord
              </Button>
            </div>
          </div>
        </section>
      </main>
      
      <Footer />
    </div>
  );
};

export default Games;