import { Link } from "react-router-dom";

interface CardProps {
  title: string;
  description: string;
  link: string;
  img: string;
  tags: any[];
}

export function Cards( { title, description, link, img, tags }: CardProps ) {
  return (
    
    <div className="max-w-xs rounded overflow-hidden shadow-lg bg-white">
      <Link to={link}>
      <img className="w-full" src={img} alt="Sunset in the mountains" />
      <div className="px-6 py-4">
        <div className="font-bold text-gray-700 text-xl mb-2">{title}</div>
        <p className="text-gray-700 text-base">
          {description}
        </p>
      </div>
      
      <div className="px-6 pt-4 pb-2">
        {tags.map((tag) => (
          <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{tag}</span>
        ))}
      </div>
      </Link>
    </div>
    
  )
}