import { useState, useCallback } from 'react';
import { Button } from "@/components/ui/button";
import { removeBackground, loadImage } from "@/lib/backgroundRemoval";
import { Download, Upload, Loader2 } from "lucide-react";

const BackgroundRemover = () => {
  const [isProcessing, setIsProcessing] = useState(false);
  const [processedImage, setProcessedImage] = useState<string | null>(null);
  const [originalImage, setOriginalImage] = useState<string | null>(null);

  const handleImageUpload = useCallback(async (event: React.ChangeEvent<HTMLInputElement>) => {
    const file = event.target.files?.[0];
    if (!file) return;

    setOriginalImage(URL.createObjectURL(file));
    setIsProcessing(true);
    
    try {
      const imageElement = await loadImage(file);
      const resultBlob = await removeBackground(imageElement);
      const resultUrl = URL.createObjectURL(resultBlob);
      setProcessedImage(resultUrl);
    } catch (error) {
      console.error('Error processing image:', error);
      alert('Erro ao processar a imagem. Tente novamente.');
    } finally {
      setIsProcessing(false);
    }
  }, []);

  const downloadImage = useCallback(() => {
    if (!processedImage) return;
    
    const link = document.createElement('a');
    link.href = processedImage;
    link.download = 'tdfa-logo-sem-fundo.png';
    link.click();
  }, [processedImage]);

  return (
    <div className="bg-gradient-card p-8 rounded-lg border border-border shadow-intense max-w-4xl mx-auto">
      <h3 className="text-2xl font-bold mb-4 text-primary text-center">
        Remover Fundo do Logo
      </h3>
      
      <div className="space-y-6">
        <div className="text-center">
          <input
            type="file"
            accept="image/*"
            onChange={handleImageUpload}
            className="hidden"
            id="image-upload"
          />
          <label htmlFor="image-upload">
            <Button className="bg-gradient-orange hover:shadow-glow transition-all cursor-pointer" asChild>
              <span>
                <Upload className="w-4 h-4 mr-2" />
                Fazer Upload da Imagem
              </span>
            </Button>
          </label>
        </div>

        {originalImage && (
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div className="text-center">
              <h4 className="text-lg font-semibold mb-2">Imagem Original</h4>
              <img src={originalImage} alt="Original" className="w-full max-w-xs mx-auto rounded-lg" />
            </div>
            
            <div className="text-center">
              <h4 className="text-lg font-semibold mb-2">Sem Fundo</h4>
              {isProcessing ? (
                <div className="flex items-center justify-center h-48">
                  <Loader2 className="w-8 h-8 animate-spin text-primary" />
                  <span className="ml-2">Processando...</span>
                </div>
              ) : processedImage ? (
                <div>
                  <img 
                    src={processedImage} 
                    alt="Sem fundo" 
                    className="w-full max-w-xs mx-auto rounded-lg bg-checkerboard"
                    style={{
                      backgroundImage: `
                        linear-gradient(45deg, #ccc 25%, transparent 25%), 
                        linear-gradient(-45deg, #ccc 25%, transparent 25%), 
                        linear-gradient(45deg, transparent 75%, #ccc 75%), 
                        linear-gradient(-45deg, transparent 75%, #ccc 75%)
                      `,
                      backgroundSize: '20px 20px',
                      backgroundPosition: '0 0, 0 10px, 10px -10px, -10px 0px'
                    }}
                  />
                  <Button 
                    onClick={downloadImage}
                    className="mt-4 bg-gradient-orange hover:shadow-glow transition-all"
                  >
                    <Download className="w-4 h-4 mr-2" />
                    Baixar PNG
                  </Button>
                </div>
              ) : (
                <div className="h-48 border-2 border-dashed border-border rounded-lg flex items-center justify-center">
                  <span className="text-muted-foreground">Aguardando processamento...</span>
                </div>
              )}
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default BackgroundRemover;