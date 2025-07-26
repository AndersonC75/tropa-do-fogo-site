import Header from "@/components/Header";
import Footer from "@/components/Footer";
import BackgroundRemover from "@/components/BackgroundRemover";

const LogoProcessor = () => {
  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-20">
        <section className="py-20 bg-gradient-hero">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-6xl font-bold mb-6">
              <span className="bg-gradient-orange bg-clip-text text-transparent">
                Processador de Logo
              </span>
            </h1>
            <p className="text-xl text-muted-foreground max-w-3xl mx-auto mb-8">
              Ferramenta para remover o fundo do logo da TDFA usando IA.
            </p>
          </div>
        </section>

        <section className="py-16 bg-background">
          <div className="container mx-auto px-4">
            <BackgroundRemover />
          </div>
        </section>
      </main>
      
      <Footer />
    </div>
  );
};

export default LogoProcessor;