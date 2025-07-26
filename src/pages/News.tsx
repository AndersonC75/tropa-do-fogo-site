import Header from "@/components/Header";
import Footer from "@/components/Footer";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Calendar, Clock, User, ArrowRight, MessageSquare } from "lucide-react";

const News = () => {
  const newsArticles = [
    {
      title: "TDFA Conquista Primeiro Lugar no Torneio Regional de GTA Online",
      excerpt: "Nossa crew dominou a competição contra outras 15 equipes, levando o troféu de ouro e um prêmio de $50.000 em dinheiro do jogo.",
      content: "Em uma batalha épica que durou 3 horas...",
      date: "2024-01-20",
      author: "Admin TDFA",
      category: "Conquistas",
      featured: true,
      image: "🏆"
    },
    {
      title: "Novo Update do GTA Online: The Chop Shop",
      excerpt: "Rockstar lança nova atualização focada em carros e corridas. Veja como isso afeta nossa comunidade e nossos eventos.",
      content: "A mais nova atualização do GTA Online...",
      date: "2024-01-18",
      author: "Moderador",
      category: "Updates",
      featured: true,
      image: "🚗"
    },
    {
      title: "Evento Especial: Heist Marathon - 48 Horas Diretas",
      excerpt: "Prepare-se para o maior evento da TDFA! 48 horas consecutivas de assaltos com premiações incríveis para os participantes.",
      content: "Este fim de semana será histórico...",
      date: "2024-01-15",
      author: "Organizador",
      category: "Eventos",
      featured: false,
      image: "💰"
    },
    {
      title: "Nova Parceria: TDFA x StreamersBR",
      excerpt: "Fechamos parceria com o coletivo StreamersBR para eventos colaborativos e maior visibilidade da nossa comunidade.",
      content: "Estamos orgulhosos de anunciar...",
      date: "2024-01-12",
      author: "Admin TDFA",
      category: "Parcerias",
      featured: false,
      image: "🤝"
    },
    {
      title: "Guia Completo: Como Maximizar seus Ganhos no Cayo Perico",
      excerpt: "Tutorial detalhado com as melhores estratégias para completar o assalto mais lucrativo do GTA Online de forma eficiente.",
      content: "O Cayo Perico continua sendo...",
      date: "2024-01-10",
      author: "Pro Player",
      category: "Guias",
      featured: false,
      image: "📖"
    },
    {
      title: "TDFA Atinge 1000 Membros no Discord!",
      excerpt: "Celebramos este marco histórico com eventos especiais e sorteios para toda a comunidade. Obrigado a todos!",
      content: "É com muito orgulho que...",
      date: "2024-01-08",
      author: "Fundador",
      category: "Marcos",
      featured: false,
      image: "🎉"
    }
  ];

  const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  };

  const getCategoryColor = (category: string) => {
    const colors: { [key: string]: string } = {
      'Conquistas': 'bg-gradient-orange',
      'Updates': 'bg-blue-500/20 text-blue-400 border-blue-500/30',
      'Eventos': 'bg-green-500/20 text-green-400 border-green-500/30',
      'Parcerias': 'bg-purple-500/20 text-purple-400 border-purple-500/30',
      'Guias': 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30',
      'Marcos': 'bg-pink-500/20 text-pink-400 border-pink-500/30'
    };
    return colors[category] || 'bg-secondary';
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
                Notícias TDFA
              </span>
            </h1>
            <p className="text-xl text-muted-foreground max-w-3xl mx-auto mb-8">
              Fique por dentro de tudo que acontece na Tropa do Fogo Amigo. 
              Updates, eventos, conquistas e muito mais!
            </p>
            <div className="flex items-center justify-center space-x-2 text-muted-foreground">
              <MessageSquare className="w-5 h-5 text-primary" />
              <span>Sempre em primeira mão para nossa comunidade</span>
            </div>
          </div>
        </section>

        {/* Featured News */}
        <section className="py-16 bg-background">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-2 text-center">
              <span className="text-primary">Destaques</span>
            </h2>
            <p className="text-muted-foreground text-center mb-12">
              As notícias mais importantes da semana
            </p>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
              {newsArticles.filter(article => article.featured).map((article, index) => (
                <Card key={index} className="bg-gradient-card border-border hover:shadow-glow transition-all group">
                  <CardHeader>
                    <div className="flex items-start justify-between mb-4">
                      <div className="text-4xl">{article.image}</div>
                      <Badge className={getCategoryColor(article.category)}>
                        {article.category}
                      </Badge>
                    </div>
                    
                    <CardTitle className="text-xl mb-3 group-hover:text-primary transition-colors">
                      {article.title}
                    </CardTitle>
                    
                    <CardDescription className="text-base mb-4">
                      {article.excerpt}
                    </CardDescription>
                    
                    <div className="flex items-center space-x-4 text-sm text-muted-foreground">
                      <div className="flex items-center space-x-1">
                        <Calendar className="w-4 h-4" />
                        <span>{formatDate(article.date)}</span>
                      </div>
                      <div className="flex items-center space-x-1">
                        <User className="w-4 h-4" />
                        <span>{article.author}</span>
                      </div>
                    </div>
                  </CardHeader>
                  
                  <CardContent>
                    <Button className="w-full bg-gradient-orange hover:shadow-glow transition-all group">
                      Ler Mais
                      <ArrowRight className="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" />
                    </Button>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* All News */}
        <section className="py-16 bg-gradient-hero">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-2 text-center">
              <span className="text-primary">Todas as Notícias</span>
            </h2>
            <p className="text-muted-foreground text-center mb-12">
              Histórico completo de novidades da TDFA
            </p>
            
            <div className="space-y-6">
              {newsArticles.map((article, index) => (
                <Card key={index} className="bg-gradient-card border-border hover:shadow-glow transition-all group">
                  <CardHeader>
                    <div className="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                      <div className="flex items-start space-x-4 flex-1">
                        <div className="text-3xl">{article.image}</div>
                        
                        <div className="flex-1">
                          <div className="flex items-center space-x-2 mb-2">
                            <Badge className={getCategoryColor(article.category)}>
                              {article.category}
                            </Badge>
                            {article.featured && (
                              <Badge className="bg-gradient-orange">
                                Destaque
                              </Badge>
                            )}
                          </div>
                          
                          <CardTitle className="text-lg mb-2 group-hover:text-primary transition-colors">
                            {article.title}
                          </CardTitle>
                          
                          <CardDescription className="mb-3">
                            {article.excerpt}
                          </CardDescription>
                          
                          <div className="flex items-center space-x-4 text-sm text-muted-foreground">
                            <div className="flex items-center space-x-1">
                              <Calendar className="w-4 h-4" />
                              <span>{formatDate(article.date)}</span>
                            </div>
                            <div className="flex items-center space-x-1">
                              <User className="w-4 h-4" />
                              <span>{article.author}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div className="flex-shrink-0">
                        <Button className="bg-gradient-orange hover:shadow-glow transition-all group">
                          Ler Artigo
                          <ArrowRight className="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" />
                        </Button>
                      </div>
                    </div>
                  </CardHeader>
                </Card>
              ))}
            </div>
            
            <div className="text-center mt-12">
              <Button variant="outline" className="border-primary text-primary hover:bg-primary hover:text-primary-foreground">
                Carregar Mais Notícias
              </Button>
            </div>
          </div>
        </section>

        {/* Newsletter Subscription */}
        <section className="py-16 bg-background">
          <div className="container mx-auto px-4">
            <div className="bg-gradient-card p-8 rounded-lg border border-border shadow-intense max-w-4xl mx-auto text-center">
              <h3 className="text-2xl font-bold mb-4 text-primary">
                Não Perca Nenhuma Novidade!
              </h3>
              <p className="text-lg text-muted-foreground mb-6">
                Entre no nosso Discord para receber notificações instantâneas sobre todas as novidades, 
                eventos e atualizações da TDFA em primeira mão.
              </p>
              <Button className="bg-gradient-orange hover:shadow-glow transition-all">
                <MessageSquare className="w-4 h-4 mr-2" />
                Entrar no Discord
              </Button>
            </div>
          </div>
        </section>
      </main>
      
      <Footer />
    </div>
  );
};

export default News;