import { useState, useEffect } from 'react';
import { removeBackground } from "@/lib/backgroundRemoval";

const useProcessedLogo = () => {
  const [processedLogoUrl, setProcessedLogoUrl] = useState<string | null>(null);
  const [isProcessing, setIsProcessing] = useState(false);

  useEffect(() => {
    const processLogo = async () => {
      setIsProcessing(true);
      try {
        // Use the uploaded image URL directly
        const imageUrl = "/lovable-uploads/18caeaf9-58fb-4b0f-a6f0-a632cd946dab.png";
        
        // Create image element
        const img = new Image();
        img.crossOrigin = "anonymous";
        
        await new Promise((resolve, reject) => {
          img.onload = resolve;
          img.onerror = reject;
          img.src = imageUrl;
        });
        
        // Remove background
        const resultBlob = await removeBackground(img);
        const resultUrl = URL.createObjectURL(resultBlob);
        
        setProcessedLogoUrl(resultUrl);
      } catch (error) {
        console.error('Error processing logo:', error);
        // Use original logo as fallback
        setProcessedLogoUrl("/lovable-uploads/18caeaf9-58fb-4b0f-a6f0-a632cd946dab.png");
      } finally {
        setIsProcessing(false);
      }
    };

    processLogo();
  }, []);

  return { processedLogoUrl, isProcessing };
};

export default useProcessedLogo;