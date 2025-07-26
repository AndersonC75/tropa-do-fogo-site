import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Calendar, Clock, Users, MapPin } from "lucide-react";

const Events = () => {
  const events = [
    {
      title: "Heist Night",
      date: "Sexta-feira",
      time: "21:00",
      participants: "6-8 players",
      description: "Assaltos coordenados com premiação em dinheiro do jogo",
      status: "Semanal",
      highlight: true
    },
    {
      title: "Drag Race Championship",
      date: "Sábado", 
      time: "20:00",
      participants: "16+ players",
      description: "Campeonato de arrancada com carros tunados",
      status: "Mensal",
      highlight: false
    },
    {
      title: "Crew vs Crew",
      date: "Domingo",
      time: "19:30", 
      participants: "20+ players",
      description: "Guerra entre crews em território neutro",
      status: "Especial",
      highlight: true
    },
    {
      title: "Free Roam Party",
      date: "Quarta-feira",
      time: "22:00",
      participants: "Todos",
      description: "Sessão livre para zoação e diversão",
      status: "Semanal", 
      highlight: false
    }
  ];

  return (
    <section id="events" className="py-20 bg-background">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">
            <span className="bg-gradient-orange bg-clip-text text-transparent">
              Eventos & Atividades
            </span>
          </h2>
          <p className="text-xl text-muted-foreground max-w-3xl mx-auto">
            Nunca falta ação na TDFA! Confira nossa agenda semanal de eventos e atividades.
          </p>
        </div>
        
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
          {events.map((event, index) => (
            <Card 
              key={index} 
              className={`bg-gradient-card border-border transition-all hover:shadow-glow ${
                event.highlight ? 'ring-2 ring-primary/50' : ''
              }`}
            >
              <CardHeader>
                <div className="flex items-start justify-between">
                  <div>
                    <CardTitle className="text-xl mb-2">{event.title}</CardTitle>
                    <CardDescription className="text-base">
                      {event.description}
                    </CardDescription>
                  </div>
                  <Badge 
                    variant={event.highlight ? "default" : "secondary"}
                    className={event.highlight ? "bg-gradient-orange" : ""}
                  >
                    {event.status}
                  </Badge>
                </div>
              </CardHeader>
              
              <CardContent>
                <div className="space-y-3">
                  <div className="flex items-center space-x-3 text-sm">
                    <Calendar className="w-4 h-4 text-primary" />
                    <span>{event.date}</span>
                    <Clock className="w-4 h-4 text-primary ml-4" />
                    <span>{event.time}</span>
                  </div>
                  
                  <div className="flex items-center space-x-3 text-sm">
                    <Users className="w-4 h-4 text-primary" />
                    <span>{event.participants}</span>
                  </div>
                </div>
              </CardContent>
            </Card>
          ))}
        </div>
        
        <div className="text-center">
          <div className="bg-gradient-card p-8 rounded-lg border border-border shadow-intense max-w-4xl mx-auto">
            <h3 className="text-2xl font-bold mb-4 text-primary">
              Quer organizar um evento?
            </h3>
            <p className="text-lg text-muted-foreground mb-6">
              Membros ativos podem propor e organizar seus próprios eventos. 
              Entre em contato com a administração no Discord para mais detalhes.
            </p>
            <Button className="bg-gradient-orange hover:shadow-glow transition-all">
              Propor Evento
            </Button>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Events;