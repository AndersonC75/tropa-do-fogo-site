import Header from "@/components/Header";
import Hero from "@/components/Hero";
import Community from "@/components/Community";
import Events from "@/components/Events";
import Footer from "@/components/Footer";

const Index = () => {
  return (
    <div className="min-h-screen bg-background">
      <Header />
      <Hero />
      <Community />
      <Events />
      <Footer />
    </div>
  );
};

export default Index;
